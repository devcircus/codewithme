<template>
    <div class="p-4 bg-green-300 rounded border border-green-500 flex items-center justify-between">
        <div class="flex items-center">
            <icon name="notification" class="flex-no-shrink w-4 h-4 fill-green-800 mr-2" />
            <div class="text-green-800">
                <slot />
            </div>
        </div>
    </div>
</template>

<script>
import Icon from '@/Shared/Icon'

export default {
  components: {
    Icon,
  },
}
</script>
