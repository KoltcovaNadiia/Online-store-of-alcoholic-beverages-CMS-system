/** @type { import('@storybook/react-vite').StorybookConfig } */
const config = {
  stories: [
    "../react-ui/src/components/**/*.stories.@(js|jsx|ts|tsx)"
  ],
  addons: [
    "@storybook/addon-essentials",
    "@storybook/addon-onboarding",
    "@chromatic-com/storybook",
    "@storybook/experimental-addon-test",
    "storybook-dark-mode"
  ],
  framework: {
    name: "@storybook/react-vite",
    options: {}
  },
  docs: {
    autodocs: "tag" // автоматична генерація документації
  }
};

export default config;
