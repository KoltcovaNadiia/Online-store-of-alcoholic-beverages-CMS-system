import { themes } from '@storybook/theming';

const preview = {
    parameters: {
        controls: {
            matchers: {
                color: /(background|color)$/i,
                date: /Date$/,
            },
        },
        darkMode: {
            dark: themes.dark,
            light: themes.light,
        },
    },
};

export default preview;
