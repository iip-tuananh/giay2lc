<script>
    class Attribute extends BaseClass {
        no_set = [];

        before(form) {

        }

        after(form) {

        }

        get submit_data() {
            let data = {
                name: this.name,
                name_en: this.name_en,
            }

            return data;
        }
    }
</script>
