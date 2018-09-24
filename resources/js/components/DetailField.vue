<template>
    <panel-item :field="field">
        <template v-if="field.value" slot="value">
            <iframe width="640" height="120"
                    :src="'https://www.mixcloud.com/widget/iframe/?hide_cover=1&light=1&feed='+field.basePath"
                    frameborder="0" ></iframe>
        </template>
    </panel-item>
</template>

<script>
export default {
    props: ['resource', 'resourceName', 'resourceId', 'field'],
}
</script>
