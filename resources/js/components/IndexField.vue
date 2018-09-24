<template>
    <p>
        <a v-if="field.value" :href="field.value" target="_blank" rel="noopener"><img :src="field.picture" style="object-fit: cover;" class="rounded-full w-8 h-8" /></a>
        <span v-else>&mdash;</span>
    </p>
</template>

<script>
export default {
    props: ['resourceName', 'field'],

    methods: {
        /**
         * Fill the given FormData object with the field's internal value.
         */
        fill(formData) {
            formData.append(this.field.attribute, this.value || '')
        }
    }
}
</script>
