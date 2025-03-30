import React from "react";

export const Button = ({
                           label,
                           variant = "primary",
                           size = "medium",
                           onClick,
                           disabled = false
                       }) => {
    const getBackground = () => {
        if (variant === "primary") return "#007bff";
        if (variant === "secondary") return "#6c757d";
        if (variant === "danger") return "#dc3545";
        return "#007bff";
    };

    const getPadding = () => {
        if (size === "small") return "6px 12px";
        if (size === "large") return "14px 22px";
        return "10px 16px"; // medium
    };

    return (
        <button
            onClick={onClick}
            disabled={disabled}
            style={{
                backgroundColor: disabled ? "#ccc" : getBackground(),
                color: "#fff",
                padding: getPadding(),
                border: "none",
                borderRadius: "8px",
                cursor: disabled ? "not-allowed" : "pointer",
                fontWeight: "600",
                fontSize: size === "small" ? "14px" : size === "large" ? "18px" : "16px",
                transition: "background-color 0.3s, transform 0.1s",
            }}
            onMouseDown={(e) => !disabled && (e.target.style.transform = "scale(0.97)")}
            onMouseUp={(e) => (e.target.style.transform = "scale(1)")}
            onMouseLeave={(e) => (e.target.style.transform = "scale(1)")}
        >
            {label}
        </button>
    );
};
