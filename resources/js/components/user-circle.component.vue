<template>
    <div class="user-circle p-1 rounded-full">
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
  color: $text-color;
  border: 2px solid $text-color;
  width: 35px;
  height: 35px;
  background: white;
  cursor: pointer;
}
.user-circle:not(:first-child) {
  margin-left: -5px;
}
.user-initial {
  margin-top: 2px;
  user-select: none;
}
</style>
