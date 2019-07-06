<template>
    <div>

        <label for="template-name">Template Name</label>
        <input id="template-name" type="text" v-model="template_name">

        <div v-for="(template_datum, index) in template_data">

            <label for="label">Label</label>
            <input id="label" type="text" v-model="template_datum.label">

            <label for="template-type">Data Type</label>
            <select name="template_type" id="template-type" v-model="template_datum.type">
                <option v-for="type in template_valid_types" v-bind="type">{{type}}</option>
            </select>

            <div v-if="template_datum.type === 'text'">
                @Text
            </div>
            <div v-if="template_datum.type === 'longtext'">
                @LongText
            </div>

            <div v-if="template_datum.type === 'dropdown'">

                <!-- Add options -->
                @Dropdown
                <div v-for="option in template_datum.options">
                    <input type="text" v-model="option.value">
                </div>

                <button @click="addDropdownOption(index)">Add Option</button>

            </div>

        </div>

        <button @click="addFormElement">Add</button>

        <pre>{{ JSON.stringify(template_data, null, 2) }}</pre>
    </div>
</template>

<script>

    export default {

        data: () => {
            return {
                template_valid_types: [
                    {label: 'Text', 'value': 'text'},
                    {label: 'Long Text', 'value': 'longtext'},
                    {label: 'Dropdown', 'value': 'dropdown', options: []},
                ],
                template_name: 'name',
                template_data: [
                    {label: 'First Name', type: 'text', options: [{value: ''}]},
                    {label: 'Gender', type: 'dropdown', options: [{value: 'Male'}, {value: 'Female'}]},
                ]
            };
        },

        methods: {
            addFormElement: function (event) {
                this.template_data.push({type: 'text', options: [{value: ''}]});
            },

            addDropdownOption: function (index) {

                this.template_data[index].options.push({value: ""});

            }

        }

    };

</script>