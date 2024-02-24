import './bootstrap';
import ClipboardJS from "clipboard";
window.clipboard = ClipboardJS;

window.addEventListener('alpine:init', () => {
    Alpine.data('copyCode', () => {
        return {
            copy() {
                clipboard.copy(this.$refs.code.value);
                this.copied = true;
                this.$dispatch('copied');
            }
        }
    });
})
