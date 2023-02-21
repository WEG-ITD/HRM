<template>
    <v-tooltip top>
        <template template v-slot:activator="{ on, attrs }">
            <span v-bind="attrs" v-on="on" >
                <slot></slot>
            </span>
        </template>
        <span>{{tooltip}}</span>
    </v-tooltip>
</template>

<script>
export default {
    props:{
        tooltip:String(),
    }
};
</script>

