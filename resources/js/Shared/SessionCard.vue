<template>
    <div class="w-full md:w-1/2 border border-blue-500 shadow-md h-56">
        <h1 class="text-gray-800 text-2xl font-semibold">{{ session.title }}</h1>
    </div>
</template>

<script>
export default {
  props: {
    session: Object,
  },
}
</script>
