<script>
    class AboutUsGallery extends BaseChildClassWithFile {

        before(form) {
            this.image = {};
        }

        get image() {
            return this._image;
        }

        set image(value) {
            this._image = new Image(value, this);
        }

        get submit_data() {
            return {
                title: this.title,
                content: this.content,
                title_en: this.title_en,
                content_en: this.content_en,
            }
        }
    }
</script>
