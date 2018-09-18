<template>
    <div class="user-circle p-1 rounded-full shadow">
        <div class="user-initial">
            {{ text }}
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'text'
    ]
}
</script>

<style lang="scss" scoped>
@import "~@/app.scss";
.user-circle {
  display: flex;
  justify-content: center;
  align-items: center;
  color: white;
  border: 2px solid white;
  width: 37.5px;
  height: 37.5px;
  background: $text-color;
  // cursor: pointer;
}
.user-circle:not(:first-child) {
  margin-left: -7.5px;
}
.user-initial {
  margin-top: 2px;
  // user-select: none;
}
</style>
