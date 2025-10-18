<template>
    <div class="col-md-12">
        <label :for="name" :class="labelClasses">{{ localedLabel }} <span class="text-danger">*</span></label>
        <vue-tel-input :input-id="name"
                       :name="name"
                       :value="value"
                       :wrapper-classes="wrapperClasses"
                       :input-classes="inputClasses"
                       :default-country="defaultCountry"
                       :auto-default-country="true"
                       :dropdown-options="{showSearchBox: true}"
                       @country-changed="countryChanged"></vue-tel-input>
        <input type="hidden" name="phone_code" :value="phoneCode">
    </div>
</template>

<script>
export default {
    props: {
        label: {
            required: false,
            type: String,
            default: null,
        },
        code: {
            required: false,
            type: String,
            default: null,
        },
        name: {
            required: false,
            type: String,
            default: 'phone',
        },
        value: {
            required: false,
            type: String,
            default: '',
        },
        labelClasses: {
            required: false,
            type: Array,
            default() {
                return []
            },
        },
        wrapperClasses: {
            required: false,
            type: Array,
            default() {
                return ['input-group']
            },
        },
        inputClasses: {
            required: false,
            type: Array,
            default() {
                return ['form-control']
            },
        },
        defaultCountry: {
            required: false,
            type: String,
            default: 'sa',
        },
    },
    computed: {
        localedLabel() {
            return this.label ? this.label : this.$t('customers.attributes.phone')
        }
    },
    data() {
        return {
            phoneCode: null,
        }
    },
    methods: {
        countryChanged(country) {
            this.phoneCode = country.iso2
        },
    },
}
</script>

