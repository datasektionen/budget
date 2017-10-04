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
                    return this.value.toString()
                } else {
                    return this.fmt(this.value)
                }
            },
            set: function(modifiedValue) {
                let newValue = this.defmt(modifiedValue)
                if (isNaN(newValue)) {
                    newValue = 0
                }
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