import React from "react";

export const AuthInput = ({ placeholder }) => {
    return (
        <input
            className="auth-input"
            type="text"
            placeholder={placeholder}
        ></input>
    );
};
