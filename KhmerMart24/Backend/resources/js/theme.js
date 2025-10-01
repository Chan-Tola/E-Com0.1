window.themeStore = function () {
    return {
        dark: localStorage.getItem("theme") === "true" || false,

        toggleTheme() {
            this.dark = !this.dark;

            localStorage.setItem("theme", this.dark);
        },
    };
};
