<template>
    <div>
        <h1>{{ itemTitle }}</h1>
        <p>{{ itemContent }}</p>
    </div>
</template>

<script>
    export default {
        props: {
            itemTitle: String,
            itemContent: String,
            price: Number,
        },
        mounted() {
            console.log(this.itemTitle);
            // Uncomment to see why modifying prop is bad idea!
            // never modify the props
            // this.itemTitle = "New Title";
            setTimeout(() => {
                this.itemTitle = "New title";
            }, 15000);
        }
    };
</script>