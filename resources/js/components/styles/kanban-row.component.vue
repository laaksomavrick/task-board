<template>
    <div class="kanban-row px-2">
        <slot></slot>
    </div>
</template>

<style lang="scss" scoped>
.kanban-row {
    height: 100%;
    display: flex;
    flex: 0 0 300px;
    flex-direction: column;
    max-width: 300px;
    width: 300px;
}
</style>
