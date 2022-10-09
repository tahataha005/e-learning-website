import React from "react";

const AdminSideButton = ({ text, className, onClick }) => {
    const classes = `${className} btn round-edges dark-bg white-txt`;
    return (
        <button onClick={onClick} className={classes}>
            {text}
        </button>
    );
};

export default AdminSideButton;
