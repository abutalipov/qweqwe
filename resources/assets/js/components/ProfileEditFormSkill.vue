<template>
    <div class="form-group">
        <label class="form-group__label type-h3 type-h4_m c-g" for="" @click="test">Skillsg</label>
        <select class="form-group__input" multiple="multiple" id="skills" name="skills[]"></select>
    </div>
</template>

<script>

    //import $ from 'jquery';
    import 'select2/dist/js/select2.full';
    import 'select2/dist/css/select2.min.css'

    export default {


        props: ['options', 'value'],
        //template: '#select2-template',
        methods: {
            test() {
                console.log('asd')
                let v = [{id: 1, text: 'asd'}];

                $(this.$el)
                    .find('select')
                    .val(v)
                    .trigger('change')

            },
        },
        mounted: function () {
            var vm = this
            $(this.$el)
                .find('select')
                // init select2
                .select2(
                    {
                        ajax: {
                            url: '/skills/pluck',
                            dataType: 'json',
                            delay: 350
                        },
                        data: this.options,
                        cache: true,
                        minimumInputLength: 2,
                    })
                .val(this.value)
                .trigger('change')
                // emit event on change.
                .on('change', function () {
                    vm.$emit('input', this.value)
                })
        },
        watch: {
            value: function (value) {
                // update value
                $(this.$el)
                    .find('select')
                    .val(value)
                    .trigger('change')
            },
            options: function (options) {
                // update options
                $(this.$el).find('select').empty().select2({data: options})
            }
        },
        destroyed: function () {
            $(this.$el).find('select').off().select2('destroy')
        }


    };
</script>
