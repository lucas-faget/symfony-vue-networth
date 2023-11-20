<script lang="ts" setup>
    import ProfileCard from '../components/ProfileCard.vue'
</script>

<template>
    <div class="homepage">
        <div class="content">
            <div class="left">
                <ProfileCard />
            </div>
            <div class="middle">middle</div>
            <div class="right">right</div>
        </div>
    </div>
</template>

<style scoped>
    .homepage {
        padding-block: var(--section-gap);
        display: flex;
        justify-content: center;
    }

    .content {
        display: grid;
        grid-template-columns: repeat(3);
        grid-gap: 20px;
    }

    .left, .middle, .right {
        background: var(--color-gray-100);
        padding-bottom: 20px;
        border-radius: 10px;
    }

    .left, .right {
        width: var(--aside-width);
    }

    .middle {
        width: var(--middle-section-width);
    }

    @media screen and (min-width: 1181px) {
        .left {
            grid-column: 1;
            grid-row: 1;
        }

        .middle {
            grid-column: 2;
            grid-row: 1;
        }

        .right {
            grid-column: 3;
            grid-row: 1;
        }
    }

    @media screen and (max-width: 1180px) {
        .left {
            grid-column: 1;
            grid-row: 1;
        }

        .middle {
            grid-column: 2 / 4;
            grid-row: 1 / 4;
        }

        .right {
            grid-column: 1;
            grid-row: 2 / 4;
        }
    }

    @media screen and (max-width: 860px) {
        .left, .right {
            width: var(--middle-section-width);
        }

        .left {
            grid-column: 1 / 4;
            grid-row: 1;
        }

        .middle {
            grid-column: 1 / 4;
            grid-row: 3;
        }

        .right {
            grid-column: 1 / 4;
            grid-row: 2;
        }
    }
</style>
