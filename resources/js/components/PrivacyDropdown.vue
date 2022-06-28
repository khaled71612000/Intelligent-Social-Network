<template>
    <div class="dropleft text-center">
        <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
            data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
            <PrivacyItem :type='selectedPrivacy' :showText='false'></PrivacyItem>
        </button>
        <div :class="'dropdown-menu ' + forWhat" aria-labelledby="dropdownMenuButton">
            <a @click='selectItem("Public")' v-if='except != "Public" ' :class="'dropdown-item' + (selected == 'Public' ? ' selected' : '')" href="#">
                <PrivacyItem type='Public'></PrivacyItem>
            </a>
            <a @click='selectItem("Friend")' v-if='except != "Friend"' :class="'dropdown-item' + (selected == 'Friend' ? ' selected' : '')" href="#">
                <PrivacyItem type='Friend'></PrivacyItem>
            </a>
            <a @click='selectItem("Private")' v-if='except != "Private" ' :class="'dropdown-item' + (selected == 'Private' ? ' selected' : '')" href="#">
                <PrivacyItem type='Private'></PrivacyItem>
            </a>
        </div>
    </div>
</template>

<script>
import PrivacyItem from './PrivacyItem';
    export default {
        props:['except', 'selected', 'forWhat'],
        data() {
            return {
                selectedPrivacy: this.selected
            } 
        },
        components: {
            PrivacyItem,
        },
        methods: {
            selectItem(privacyType) {
                let itemSelected = document.querySelectorAll(`.${this.forWhat} .selected`);
                console.log(this.forWhat+'  ' + privacyType);
                itemSelected[0].classList.remove('selected');
                event.target.classList.add('selected');

                this.$emit('privacyChanged', this.forWhat, privacyType);
                this.selectedPrivacy = privacyType;
            }
        }
    }

</script>

<style scoped>
.selected {
    color: #00adb5;
}
</style>
