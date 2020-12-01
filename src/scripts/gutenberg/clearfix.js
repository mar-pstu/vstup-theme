( function( blocks, editor, i18n, element, components, _ ) {
    var el = element.createElement;

    blocks.registerBlockType( 'pstu-next-theme/clearfix', {
        title: i18n.__( 'PSTU Clearfix', 'pstu-next-theme' ),
        description: i18n.__( 'Используется для решения проблем, возникающих при содержании «плавающих» элементов в рамках блока контейнера или обтекания элементов', 'pstu-next-theme' ),
        keywords: [
            i18n.__( 'ПГТУ', 'pstu-next-theme' ),
            i18n.__( 'очистка', 'pstu-next-theme' ),
            i18n.__( 'ластик', 'pstu-next-theme' ),
            i18n.__( 'обтекание', 'pstu-next-theme' ),
            i18n.__( 'изображение', 'pstu-next-theme' ),
            i18n.__( 'выравнивание', 'pstu-next-theme' ),
        ],
        icon: el(
            'img', {
                'src': "data:image/svg+xml;base64,PHN2ZyBoZWlnaHQ9IjUxMiIgdmlld0JveD0iMCAtMTggNDQwLjk2IDQ0MCIgd2lkdGg9IjUxMiIgeG1sbnM9Imh0dHA6Ly93d3cudzMub3JnLzIwMDAvc3ZnIj48Zz48cGF0aCBkPSJtNDEwLjY2Nzk2OSA0MDUuMjA3MDMxaC0zOTQuNjY3OTY5Yy04LjgzMjAzMSAwLTE2LTcuMTY3OTY5LTE2LTE2czcuMTY3OTY5LTE2IDE2LTE2aDM5NC42Njc5NjljOC44MzIwMzEgMCAxNiA3LjE2Nzk2OSAxNiAxNnMtNy4xNjc5NjkgMTYtMTYgMTZ6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojNTU1RDY2IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0yMTYuNzQ2MDk0IDQwNS4yMDcwMzFjLTQuMDkzNzUgMC04LjE5MTQwNi0xLjU1ODU5My0xMS4zMDQ2ODgtNC42OTUzMTItNi4yNTM5MDYtNi4yNS02LjI1MzkwNi0xNi4zODI4MTMgMC0yMi42MzI4MTNsMTk1LjYyNS0xOTUuNjI4OTA2YzUuMDk3NjU2LTUuMDk3NjU2IDcuODk0NTMyLTExLjc1MzkwNiA3Ljg5NDUzMi0xOC43NzM0MzggMC03LjE0NDUzMS0yLjc5Njg3Ni0xMy44ODY3MTgtNy44OTQ1MzItMTguOTg0Mzc0bC0xMDQuNzQ2MDk0LTEwNC43NWMtNi4zOTg0MzctNi41MjczNDQtMTMuODQzNzUtNy44NzEwOTQtMTguOTg4MjgxLTcuODcxMDk0LTcuMTI1IDAtMTMuNzU3ODEyIDIuNzUzOTA2LTE4LjY0NDUzMSA3Ljc2NTYyNWwtMjE4Ljc5Mjk2OSAyMTguNzk2ODc1Yy02LjU1MDc4MSA2LjM5ODQzNy03Ljg5NDUzMSAxMy44MjQyMTgtNy44OTQ1MzEgMTguOTg0Mzc1IDAgNy4xMjUgMi43NTM5MDYgMTMuNzYxNzE5IDcuNzY1NjI1IDE4LjY0NDUzMWw4MS44MzU5MzcgODEuODM1OTM4YzYuMjUgNi4yNSA2LjI1IDE2LjM4MjgxMiAwIDIyLjYzNjcxOC02LjI1MzkwNiA2LjI1LTE2LjM4NjcxOCA2LjI1LTIyLjYzNjcxOCAwbC04MS43MDcwMzItODEuNzA3MDMxYy0xMS4wNzAzMTItMTAuODM5ODQ0LTE3LjI1NzgxMi0yNS41NzgxMjUtMTcuMjU3ODEyLTQxLjQxMDE1NiAwLTE1Ljk3NjU2MyA2LjE4NzUtMzAuNzg1MTU3IDE3LjQwNjI1LTQxLjc1bDIxOC41MzkwNjItMjE4LjUxNTYyNWMyMS42OTkyMTktMjIuMjczNDM4IDYxLjMzNTkzOC0yMi4yMzA0NjkgODMuMTM2NzE5LjEyODkwNmwxMDQuNTk3NjU3IDEwNC42MTcxODhjMTEuMTM2NzE4IDExLjEzNjcxOCAxNy4yODEyNSAyNS44OTg0MzcgMTcuMjgxMjUgNDEuNjAxNTYyIDAgMTUuNTUwNzgxLTYuMTQ0NTMyIDMwLjI1LTE3LjI4MTI1IDQxLjM4NjcxOWwtMTk1LjYyNSAxOTUuNjI1Yy0zLjExNzE4OCAzLjEzNjcxOS03LjIxMDkzOCA0LjY5NTMxMi0xMS4zMDg1OTQgNC42OTUzMTJ6bTAgMCIgZGF0YS1vcmlnaW5hbD0iIzAwMDAwMCIgY2xhc3M9ImFjdGl2ZS1wYXRoIiBzdHlsZT0iZmlsbDojNTU1RDY2IiBkYXRhLW9sZF9jb2xvcj0iIzAwMDAwMCI+PC9wYXRoPjxwYXRoIGQ9Im0zMzMuMjY5NTMxIDI4OC43MDMxMjVjLTQuMDk3NjU2IDAtOC4xOTE0MDYtMS41NTQ2ODctMTEuMzA4NTkzLTQuNjkxNDA2bC0xNjUuMTE3MTg4LTE2NS4xMjEwOTRjLTYuMjUtNi4yNS02LjI1LTE2LjM4MjgxMyAwLTIyLjYzMjgxMyA2LjI1LTYuMjUzOTA2IDE2LjM4MjgxMi02LjI1MzkwNiAyMi42MzI4MTIgMGwxNjUuMTIxMDk0IDE2NS4xMTcxODhjNi4yNSA2LjI1IDYuMjUgMTYuMzg2NzE5IDAgMjIuNjM2NzE5LTMuMTU2MjUgMy4xMTMyODEtNy4yNTM5MDYgNC42OTE0MDYtMTEuMzI4MTI1IDQuNjkxNDA2em0wIDAiIGRhdGEtb3JpZ2luYWw9IiMwMDAwMDAiIGNsYXNzPSJhY3RpdmUtcGF0aCIgc3R5bGU9ImZpbGw6IzU1NUQ2NiIgZGF0YS1vbGRfY29sb3I9IiMwMDAwMDAiPjwvcGF0aD48L2c+IDwvc3ZnPg==",
            }
        ),
        category: 'layout',

        edit: function( props ) {
            return el(
                'div', {
                    className: 'pstu-clearfix ' + props.className
                },
                el(
                    'div', {
                        className: 'pstu-clearfix-inner'
                    },
                    el(
                        'span', {
                            className: 'label'
                        },
                        'clearfix'
                    )
                ),
            );
        },

        save: function( props ) {
            return el( 'div', {
                className: 'clearfix'
            } );
        },
    } );

} )(
    window.wp.blocks,
    window.wp.editor,
    window.wp.i18n,
    window.wp.element,
    window.wp.components,
    window._,
);