import React from "react";
import { Button } from "./Button";

export default {
    title: "UI/Button",
    component: Button,
    parameters: {
        docs: {
            description: {
                component: "Базова кнопка з варіантами стилів (primary, secondary, danger), розмірами та підтримкою disabled.",
            },
        },
    },
    argTypes: {
        label: { control: "text" },
        variant: { control: "select", options: ["primary", "secondary", "danger"] },
        size: { control: "radio", options: ["small", "medium", "large"] },
        disabled: { control: "boolean" },
        onClick: { action: "clicked" },
    },
};

const Template = (args) => <Button {...args} />;

export const Primary = Template.bind({});
Primary.args = {
    label: "Primary Button",
    variant: "primary",
    size: "medium",
    disabled: false,
};

export const Secondary = Template.bind({});
Secondary.args = {
    label: "Secondary Button",
    variant: "secondary",
    size: "medium",
    disabled: false,
};

export const DangerLarge = Template.bind({});
DangerLarge.args = {
    label: "Delete",
    variant: "danger",
    size: "large",
    disabled: false,
};

export const SmallDisabled = Template.bind({});
SmallDisabled.args = {
    label: "Неможливо",
    variant: "primary",
    size: "small",
    disabled: true,
};
