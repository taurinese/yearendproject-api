<template>
    <div class="bg-indigo-500 w-1/5 py-8 shadow-md">
        <div class="w-full">
            <h2 class="text-2xl px-12 py-2 my-2 text-white font-bold">
                Spotifree
            </h2>
        </div>
        <ul class="w-full">
            <inertia-link href="/admin">
                <li
                    class="
                        px-12
                        py-2
                        my-2
                        hover:bg-indigo-700
                        hover:text-white
                        text-xl
                        flex
                        justify-start
                        items-baseline
                    "
                >
                    <img
                        class="w-4 mr-2 sidebar-icons"
                        src="/img/dashboard.svg"
                        alt="dashboard"
                    />
                    <span>Dashboard</span>
                </li>
            </inertia-link>
            <inertia-link href="/admin/posts">
                <li
                    class="
                        my-2
                        py-2
                        px-12
                        hover:bg-indigo-700
                        hover:text-white
                        text-xl
                        flex
                        justify-start
                        items-baseline
                    "
                >
                    <img
                        class="w-4 mr-2 sidebar-icons"
                        src="/img/promotion.svg"
                        alt="dashboard"
                    />
                    <span>Actualités</span>
                </li>
            </inertia-link>
            <inertia-link href="/admin/users">
                <li
                    class="
                        my-2
                        py-2
                        px-12
                        hover:bg-indigo-700
                        hover:text-white
                        text-xl
                        flex
                        justify-start
                        items-baseline
                    "
                >
                    <img
                        class="w-4 mr-2 sidebar-icons"
                        src="/img/user.svg"
                        alt="dashboard"
                    />
                    <span>Utilisateurs</span>
                </li>
            </inertia-link>
            <inertia-link href="/admin/subscribers">
                <li
                    class="
                        my-2
                        py-2
                        px-12
                        hover:bg-indigo-700
                        hover:text-white
                        text-xl
                        flex
                        justify-start
                        items-baseline
                    "
                >
                    <img
                        class="w-4 mr-2 sidebar-icons"
                        src="/img/bell.svg"
                        alt="dashboard"
                    />
                    <span>Abonnements</span>
                </li>
            </inertia-link>
            <inertia-link href="">
                <li
                    class="
                        my-2
                        py-2
                        px-12
                        hover:bg-indigo-700
                        hover:text-white
                        text-xl
                        flex
                        justify-start
                        items-baseline
                    "
                >
                    <img
                        class="w-4 mr-2 sidebar-icons"
                        src="/img/chanteur.svg"
                        alt="dashboard"
                    />
                    <span>Artistes</span>
                </li>
            </inertia-link>
            <inertia-link href="">
                <li
                    class="
                        my-2
                        py-2
                        px-12
                        hover:bg-indigo-700
                        hover:text-white
                        text-xl
                        flex
                        justify-start
                        items-baseline
                    "
                >
                    <img
                        class="w-4 mr-2 sidebar-icons"
                        src="/img/album.svg"
                        alt="dashboard"
                    />
                    <span>Albums</span>
                </li>
            </inertia-link>
            <inertia-link href="">
                <li
                    class="
                        my-2
                        py-2
                        px-12
                        hover:bg-indigo-700
                        hover:text-white
                        text-xl
                        flex
                        justify-start
                        items-baseline
                    "
                >
                    <img
                        class="w-4 mr-2 sidebar-icons"
                        src="/img/chanson.svg"
                        alt="dashboard"
                    />
                    <span>Chansons</span>
                </li>
            </inertia-link>
        </ul>
    </div>
</template>

<script>
export default {
    setup() {
        return {};
    },
};
</script>

<style lang="scss" scoped>
li:hover {
    & > img,
    & > span {
        transform: scale(1.05);
        transition-property: transform;
        transition-duration: 300ms;
    }
    .sidebar-icons {
        filter: invert(1);
        // zoom: 1.2;
    }
}
</style>
