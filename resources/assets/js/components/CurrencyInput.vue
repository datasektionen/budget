<template>
    <input type="text" v-model="displayValue" @blur="isInputActive = false" @focus="isInputActive = true" @change="change" />
</template>
<script>

export default {
    props: ['value'],
    data: function() {
        return {
            isInputActive: false
        }
    },
    computed: {
        displayValue: {
            get: function() {
                if (this.isInputActive) {
                    return isNaN(this.value) ? 0 : (this.value / 100).toString();
                } else {
                    return this.fmt(this.value / 100)
                }
            },
            set: function(modifiedValue) {
                let newValue = this.defmt(modifiedValue)
                if (isNaN(newValue)) {
                    newValue = 0
                }
                newValue *= 100
                this.$emit('input', newValue)
            }
        }
    },
    methods: {
        change() {
          this.$emit('change');
        }
    }
}
</script>