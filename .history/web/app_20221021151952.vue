<template>
    <div id="app">
        <input v-on:focus="$event.target.select()" ref="clone" readonly :value="text" />
        <button @click="copy">Copy</button>
    </div>
</template>