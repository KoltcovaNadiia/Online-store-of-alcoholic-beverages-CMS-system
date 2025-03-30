import React from 'react';
import ProductCard from './ProductCard';

export default {
    title: 'Components/ProductCard',
    component: ProductCard,
    tags: ['autodocs'],
    argTypes: {
        name: { control: 'text' },
        price: { control: 'number' },
        image: { control: 'text' },
        onBuy: { action: 'clicked' },
    },
};

const Template = (args) => <ProductCard {...args} />;

export const Default = Template.bind({});
Default.args = {
    name: 'Класичний лимонад',
    price: 49,
    image: 'https://placehold.co/150x100?text=Лимонад',
    onBuy: () => alert('Куплено: Класичний лимонад'),
};

export const Premium = Template.bind({});
Premium.args = {
    name: 'Преміум напій',
    price: 89,
    image: 'https://placehold.co/150x100/000000/FFFFFF?text=Premium',
    onBuy: () => alert('Куплено: Преміум напій'),
};

export const Discounted = Template.bind({});
Discounted.args = {
    name: 'Акційний чай',
    price: 29,
    image: 'https://placehold.co/150x100/FFDD00/000000?text=Sale',
    onBuy: () => alert('Куплено: Акційний чай'),
};

// ✅ Showcase with multiple cards
export const Showcase = () => (
    <div style={{
        display: 'flex',
        flexWrap: 'wrap',
        gap: '20px',
        justifyContent: 'center',
        padding: '20px',
    }}>
        <ProductCard {...Default.args} />
        <ProductCard {...Premium.args} />
        <ProductCard {...Discounted.args} />
    </div>
);
