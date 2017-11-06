<script>
//    var Child = {
//        template: '<div><div class="form-group"><label for="hint">Hint</label><div v-for="hint in this.hintsList"><textarea name="hint[]" class="form-control hintBox" v-model="hint.hint"></textarea></div></div><a @click.capture="this.addHint" class="btn btn-info btn-xs hintBtn">New Hint</a></div>'
//    };
    export default {
        name: 'hint-component',
        props: ['hintsList'],
        template: '<div class="form-group"><label for="hint">Hint</label><div v-for="hint in hints"><textarea class="form-control hintBox" v-model="hint.hint"></textarea><input type="hidden" name="hinterList[]" v-model="JSON.stringify(hint)" /></div><a @click.stop="addHint" class="btn btn-info btn-xs hintBtn">New Hint</a></div>',
        data: function() {
            return {
                hints: this.hintsList,
                problem: [],
            };
        },
         methods: {
             addHint: function () {
                this.hints.push({hint: ''});
            },
        }
    }
</script>
