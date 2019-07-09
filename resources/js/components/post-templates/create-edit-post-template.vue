<style>
    select {
        min-width: 135px;
    }
</style>

<template>
    <div>

        <div class="card">
            <div class="card-header">
                Main Details
            </div>
            <div class="card-body">
                <label for="template-name">Template Name</label>
                <input class="form-control" id="template-name" type="text" v-model="template_name">
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Form Details
            </div>
            <div class="card-body">
                <div v-for="(template_datum, index) in template_data">

                    <div class="row mb-3">
                        <div class="col col-md-7">
                            <div class="form-inline ">
                                <div class="form-group mr-2 ml-2">
                                    <label for="label">Label</label>
                                    <input class="form-control ml-2" id="label" type="text"
                                           v-model="template_datum.label">
                                </div>

                                <div class="form-group">
                                    <label for="template-type">Data Type</label>
                                    <select
                                            name="template_type"
                                            id="template-type"
                                            class="ml-2 form-control"
                                            v-model="template_datum.type"
                                    >
                                        <option v-for="type in template_valid_types" v-bind="type">{{type}}</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col col-md-5">
                            <div v-if="template_datum.type === 'dropdown'" class="form-group">

                                <p>Dropdown Options</p>
                                <hr>
                                <!-- Add options -->
                                <div v-for="option in template_datum.options">
                                    <div class="input-group mb-1">
                                        <input class="form-control" type="text" v-model="option.value"> <br>
                                        <span class="input-group-append">
                                            <button class="btn btn-danger">X</button>
                                        </span>

                                    </div>
                                </div>

                                <button @click="addDropdownOption(index)" class="btn btn-success mt-2">Add Option</button>

                            </div>
                        </div>
                    </div>


                </div>
                <button @click="addFormElement" class="btn btn-success">Add</button>
            </div>
        </div>

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