<script>
    export default {
        name: 'type-component',
        props: ['typesList'],
        template:
            '<select name="type" id="type" class="form-control" v-model="this.selectedtype"><option value="php">PHP</option><option value="jquery">jQuery</option></select>',
        data: function () {
            return {
                selectedtype: this.typesList,
            };
        }
    }
</script>
