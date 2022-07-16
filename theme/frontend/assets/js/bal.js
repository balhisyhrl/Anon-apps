var toastbal = new Notyf({
    duration: 5e3,
    position: {
        x: "right",
        y: "bottom"
    },
    types: [{
        type: "warning",
        background: themeColors.warning,
        icon: {
            className: "fas fa-hand-paper",
            tagName: "i",
            text: ""
        }
    }, {
        type: "info",
        background: themeColors.info,
        icon: {
            className: "fas fa-info-circle",
            tagName: "i",
            text: ""
        }
    }, {
        type: "primary",
        background: themeColors.primary,
        icon: {
            className: "fas fa-car-crash",
            tagName: "i",
            text: ""
        }
    }, {
        type: "accent",
        background: themeColors.accent,
        icon: {
            className: "fas fa-car-crash",
            tagName: "i",
            text: ""
        }
    }, {
        type: "purple",
        background: themeColors.purple,
        icon: {
            className: "fas fa-check",
            tagName: "i",
            text: ""
        }
    }, {
        type: "blue",
        background: themeColors.blue,
        icon: {
            className: "fas fa-check",
            tagName: "i",
            text: ""
        }
    }, {
        type: "green",
        background: themeColors.green,
        icon: {
            className: "fas fa-check",
            tagName: "i",
            text: ""
        }
    }, {
        type: "orange",
        background: themeColors.orange,
        icon: {
            className: "fas fa-check",
            tagName: "i",
            text: ""
        }
    }]
})