import React from "react";

const AuthButton = ({ text }) => {
    return (
        <button className="auth-btn round-edges dark-bg white-txt">
            {text}
        </button>
    );
};

export default AuthButton;
