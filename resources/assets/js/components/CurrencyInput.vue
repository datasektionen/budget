<template>
    <input type="text" v-model="displayValue" @blur="isInputActive = false" @focus="isInputActive = true" @change="change" />
</template>
<script>

function fmt(val, decimals, decimalSign, thousandDelimiter) {
        decimals = decimals || 0;
        decimalSign = decimalSign || ',';
        thousandDelimiter = thousandDelimiter || ' ';
        let sign = val < 0 ? '-' : '';
        let absValString = String(parseInt(Math.abs(Number(val) || 0).toFixed(decimals)))
        let firstThousand = absValString.length > 3 ? absValString.length % 3 : 0;
        return sign 
            + (firstThousand > 0 ? absValString.substr(0, firstThousand) + thousandDelimiter : '')
            + (absValString.substr(firstThousand).replace(/(\d{3})(?=\d)/g, "$1" + thousandDelimiter))
            + (decimals > 0 ? decimalSign + Math.abs(val - Math.abs(Number(val) || 0).toFixed(0)).toFixed(decimals).slice(2) : '')
    }

    function defmt(val) {
        val = String(val || '').replace(/(\s)/g, "")
        if (val.indexOf(',') !== -1) {
            return val.substr(0, val.indexOf(','))
        }
        return val
    }
    
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
                    return fmt(this.value)
                }
            },
            set: function(modifiedValue) {
                let newValue = defmt(modifiedValue)
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
        },
        fmt: function(val, decimals, decimalSign, thousandDelimiter) {
            decimals = decimals || 0;
            decimalSign = decimalSign || ',';
            thousandDelimiter = thousandDelimiter || ' ';
            let sign = val < 0 ? '-' : '';
            let absValString = String(parseInt(Math.abs(Number(val) || 0).toFixed(decimals)))
            let firstThousand = absValString.length > 3 ? absValString.length % 3 : 0;
            return sign 
                + (firstThousand > 0 ? absValString.substr(0, firstThousand) + thousandDelimiter : '')
                + (absValString.substr(firstThousand).replace(/(\d{3})(?=\d)/g, "$1" + thousandDelimiter))
                + (decimals > 0 ? decimalSign + Math.abs(val - Math.abs(Number(val) || 0).toFixed(0)).toFixed(decimals).slice(2) : '')
        },
        defmt: function(val) {
            val = String(val || '').replace(/(\s)/g, "")
            if (val.indexOf(',') !== -1) {
                return val.substr(0, val.indexOf(','))
            }
            return val
        }
    }
}
</script>