<template>
    <div class="team-issue px-4 mx-4">
        <div class="text-base mb-1">
            {{ header }}
        </div>
        <div class="text-3xl">
            {{ count }}
        </div>
    </div>
</template>

<script>

export default {

    props: [
        'header',
        'count'
    ]

}

</script>

<style>
.team-issue {
  display: flex;
  flex-direction: column;
  text-align: center;
}
</style>