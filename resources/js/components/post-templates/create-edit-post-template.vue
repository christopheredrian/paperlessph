<style>
    select {
        min-width: 135px;
    }

    .dropdown-options {
        border: 1px solid #8a7b7b2b;
        padding: 32px;
        background-color: #e4e5e247;
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
                        <div class="col col-md-9">
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
                                            @change="onTemplateTypeChange(index)"
                                    >
                                        <option v-for="type in template_valid_types" v-bind="type">{{type}}</option>
                                    </select>
                                </div>
                            </div>

                            <div v-if="template_datum.type === 'dropdown'"
                                 class="form-group mt-3 ml-5 dropdown-options">

                                <p>Dropdown Options</p>
                                <hr>
                                <!-- Add options -->
                                <div v-for="(option, optionIndex) in template_datum.options">
                                    <div class="input-group mb-1">
                                        <input class="form-control" type="text" v-model="option.value"> <br>
                                        <span class="input-group-append">
                                            <button @click="removeDropdownOption(index, optionIndex)"
                                                    class="btn btn-danger">X</button>
                                        </span>

                                    </div>
                                </div>

                                <button @click="addDropdownOption(index)" class="btn btn-success mt-2">Add Option
                                </button>

                            </div>
                        </div>
                    </div>


                </div>

                <div class="row">

                    <div class="col">
                        <button @click="addFormElement" class="btn btn-success">Add</button>
                        <hr>
                        <div>
                            <button
                                    :disabled="save_success"
                                    @click="onFormSave()"
                                    class="btn btn-success pull-right">
                                Save Template
                            </button>
                        </div>

                    </div>
                </div>
                <div class="row mt-2">
                    <div class="col-8"></div>
                    <div class="col-4">
                        <div v-if="save_success" class="alert alert-success pull-right">Successfully saved the entry
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!--<pre>{{ JSON.stringify(template_data, null, 2) }}</pre>-->
    </div>
</template>

<script>

    import axios from 'axios';

    export default {

        data: () => {
            return {
                save_success: false,
                template_valid_types: [
                    {label: 'Text', 'value': 'text'},
                    {label: 'Long Text', 'value': 'longtext'},
                    {label: 'Dropdown', 'value': 'dropdown', options: []},
                ],
                template_name: 'name',
                template_data: [
                    {label: 'First Name', type: 'text', options: [{value: ''}]},
                    {label: 'Gender', type: 'dropdown', options: [{value: 'Male'}, {value: 'Female'}]},
                ],
            };
        },

        methods: {

            /**
             * @param templateDataIndex
             */
            onTemplateTypeChange: function (templateDataIndex) {
                this.template_data[templateDataIndex].options = [];
            },
            /**
             * @param event
             */
            addFormElement: function (event) {
                this.template_data.push({type: 'text', options: [{value: ''}]});
            },

            /**
             *
             * @param index
             */
            addDropdownOption: function (index) {
                this.template_data[index].options.push({value: ""});
            },

            /**
             *
             * @param index
             * @param dropdownIndex
             */
            removeDropdownOption: function (index, dropdownIndex) {
                this.template_data[index].options.splice(dropdownIndex, 1);
            },

            /**
             *
             */
            onFormSave() {
                // Prepare the data, make an axios call,
                const data = {

                    'template_name': this.template_name,
                    'template_json': {
                        'template_name': this.template_name,
                        'form_elements': this.template_data
                    }
                };

                axios.post('/post-templates', data)
                    .then((response) => {
                        this.save_success = true;
                    })
                    .catch((errors) => {
                        // todo: chris - show error
                        console.log(errors);
                    });

                // Make an axios call


            }

        }

    };

</script>