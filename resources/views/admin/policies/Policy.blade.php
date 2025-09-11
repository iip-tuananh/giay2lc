<script>
    class Policy extends BaseClass {
        no_set = [];

        before(form) {
        }

        after(form) {
        }


        get submit_data() {
            let data = {
                title: this.title,
                title_en: this.title_en,
                status: this.status,
                content: this.content,
                content_en: this.content_en,
            }

            data = jsonToFormData(data);

            return data;
        }
    }
</script>
