<template>
<span :style='showText? "" : "color:#00adb5;" '>
  <span v-if='type == "Public"' ><i class="privacy-icon fas fa-globe-europe"></i> <span v-if='showText'>Public</span></span>
  <span v-if='type == "Friend"'><i class="privacy-icon fas fa-user-friends"></i> <span v-if='showText'>Friends</span></span>
  <span v-if='type == "Private"'><i class="privacy-icon fas fa-user-secret"></i> <span v-if='showText'>Private</span></span>
</span>

</template>

<script>
export default {
    props: {
      type:{
        type:String,
      },
      showText: {
        type:Boolean,
        default: true,
      }
    }
}
</script>

<style scoped>

</style>