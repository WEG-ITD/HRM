<template>
    <div>
        <template v-if="!$route.meta.requiresVisitor">
            <nav>
                <v-app-bar app>
                    <v-app-bar-nav-icon @click.stop="drawer = !drawer" />
                    <v-toolbar-title>Human Resource Management System</v-toolbar-title>
                    <v-spacer></v-spacer>
                    <div class="text-center">
                        <v-menu v-model="menu" :close-on-content-click="false" :nudge-width="100" offset-x>
                            <template v-slot:activator="{ on, attrs }">
                                <span class="pa-md-4 mx-lg-auto" v-bind="attrs" v-on="on">
                                    <v-icon right>mdi-account-circle</v-icon>
                                    <span> {{ user.name }}</span>
                                </span>
                            </template>
                            <v-card>
                                <v-list>
                                    <v-list-item>
                                        <v-list-item-avatar>
                                            <img src="https://cdn.vuetifyjs.com/images/john.jpg" alt="John">
                                        </v-list-item-avatar>
                                        <v-list-item-content>
                                            <v-list-item-title>{{ user.name }}</v-list-item-title>
                                            <v-list-item-subtitle>{{ user.position_en }}</v-list-item-subtitle>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list>
                                <v-divider class="m-0 p-0 grey"></v-divider>
                                <v-list-item-group>
                                    <v-list-item>
                                        <v-list-item-icon>
                                            <v-icon>mdi-account-circle-outline</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-title>Profile</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-divider class="m-0 p-0 grey"></v-divider>
                                    <v-list-item @change="themeChange()">
                                        <v-switch v-model="$vuetify.theme.dark"></v-switch>
                                        <v-list-item-content>
                                            <v-list-item-title>Dark Mode</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                    <v-divider class="m-0 p-0 grey"></v-divider>
                                    <v-list-item router-link="/login" @click.native="logout">
                                        <v-list-item-icon>
                                            <v-icon>mdi-exit-to-app</v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-content>
                                            <v-list-item-title>Logout</v-list-item-title>
                                        </v-list-item-content>
                                    </v-list-item>
                                </v-list-item-group>
                            </v-card>
                        </v-menu>
                    </div>
                </v-app-bar>
                <v-navigation-drawer v-model="drawer" app>
                    <v-list dense>
                        <v-card>
                            <v-img style="margin:auto" lazy-src="/images/logo/logo.png" width="88%"
                                src="/images/logo/logo.png">
                            </v-img>
                        </v-card>
                        <template v-for="menu in menus">
                            <v-list-item color="primary" link :to="menu.link" :key="menu.id"
                                v-if="(menu.parentId == null || menu.parentId == 0) && menu.children.length == 0 && menu.type == 1"
                                :class="[(($route.fullPath === menu.link) || ($route.fullPath === '/dashboard' && menu.link === '/')) ? 'v-item--active v-list-item--active' : '']">
                                <template>
                                    <v-list-item-icon>
                                        <v-icon>{{ menu.icon }}</v-icon>
                                    </v-list-item-icon>
                                    <v-list-item-title>{{ menu.name }}</v-list-item-title>
                                </template>
                            </v-list-item>
                            <v-list-group :key="menu.id"
                                v-if="(menu.parentId == null || menu.parentId == 0) && menu.children.length > 0 && menu.type == 0"
                                :value="currentLinkIsChild(menu.children)" :prepend-icon="menu.icon">
                                <template v-slot:activator>
                                    <v-list-item-title>{{ menu.name }}</v-list-item-title>
                                </template>
                                <template v-for="sub, i in menu.children">
                                    <v-list-item :key="i" link :to="sub.link">
                                        <v-list-item-icon>
                                            <v-icon v-text="sub.icon"></v-icon>
                                        </v-list-item-icon>
                                        <v-list-item-title v-text="sub.name"></v-list-item-title>
                                    </v-list-item>
                                </template>
                            </v-list-group>
                        </template>
                    </v-list>
                </v-navigation-drawer>
            </nav>
        </template>
    </div>
</template>

<script>
    export default {
        props: {
            source: String
        },
        data() {
            return {
                user: null,
                drawer: null,
                menu: "",
                notifications: []
            };
        },
        computed: {
            menus() {
                return this.$store.state.auth.menu;
            }
        },
        created() {
            this.listToTree(this.menus);
            this.user = this.$store.state.auth.user;
        },
        methods: {
            logout() {
                this.$store.dispatch("destroyToken").then(() => {
                    this.$router.push({ name: "admin.login" });
                });
            },
            listToTree(list) {
                list.sort((a, b) => a.ordering - b.ordering);

                const map = {};
                let node;
                const roots = [];
                for (let i = 0; i < list.length; i++) {
                    map[list[i].id] = i;
                    list[i].children = [];
                }
                for (let i = 0; i < list.length; i++) {
                    node = list[i];
                    if (node.parentId !== null && node.parentId !== 0) {
                        if (list[map[node.parentId]]) {
                            list[map[node.parentId]].children.push(node);
                        }
                    } else {
                        roots.push(node);
                    }
                }
                return roots;
            },
            currentLinkIsChild(children) {
                let childHas = 0;
                children.forEach((element) => {
                    if (element.link === this.$route.fullPath) {
                    childHas++;
                    }
                });
                return childHas > 0;
            },
            noticed(n) {
                this.notifications.splice(0, 1);
                this.$inertia.post("notifications/noticed", n);
            },
            themeChange() {
                localStorage.setItem(
                    "theme_dark",
                    this.$vuetify.theme.dark.toString()
                );
            }
        }
    };

</script>
