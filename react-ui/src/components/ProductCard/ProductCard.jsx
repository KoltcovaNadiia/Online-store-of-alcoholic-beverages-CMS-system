import React from 'react';

const ProductCard = ({ name, price, image, onBuy }) => {
    return (
        <div style={{
            border: '1px solid #ddd',
            borderRadius: '10px',
            padding: '16px',
            maxWidth: '280px',
            margin: '10px',
            backgroundColor: '#fff',
            boxShadow: '0 2px 8px rgba(0, 0, 0, 0.1)',
            display: 'flex',
            flexDirection: 'column',
            alignItems: 'center',
            transition: 'transform 0.2s ease',
        }}>
            <img src={image} alt={name} style={{
                width: '100%',
                borderRadius: '8px',
                objectFit: 'cover',
                height: '160px'
            }} />
            <h3 style={{ margin: '12px 0 8px', fontSize: '1.2rem' }}>{name}</h3>
            <p style={{ fontWeight: 'bold', color: '#007bff' }}>{price} грн</p>
            <button
                onClick={onBuy}
                style={{
                    marginTop: 'auto',
                    backgroundColor: '#28a745',
                    color: '#fff',
                    padding: '10px 16px',
                    border: 'none',
                    borderRadius: '6px',
                    cursor: 'pointer',
                    transition: 'background-color 0.2s ease'
                }}
                onMouseOver={(e) => e.currentTarget.style.backgroundColor = '#218838'}
                onMouseOut={(e) => e.currentTarget.style.backgroundColor = '#28a745'}
            >
                Купити
            </button>
        </div>
    );
};

export default ProductCard;
