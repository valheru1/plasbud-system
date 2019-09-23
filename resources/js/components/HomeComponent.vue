<template>
    <v-card
    width="400"
    top>
        <v-card-title>Zadania na dziś</v-card-title>
        <v-card-text>
            <v-checkbox v-model="checkbox1" :label="`Checkbox 1: ${checkbox1.toString()}`"></v-checkbox>
        </v-card-text>
    </v-card>
</template>

<script>
export default {
    data() {
        return {
            checkbox1: false,
        }
    }
}
</script>
