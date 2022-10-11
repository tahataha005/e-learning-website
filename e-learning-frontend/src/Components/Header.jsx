import React from "react";

const Header = () => {
    return (
        <div className="header-box flex round-edges dark-bg">
            <div className="coursestamp flex column">
                <p className="title">Course Name</p>
                <p className="subtitle white-txt">Instructor Name</p>
            </div>
        </div>
    );
};

export default Header;
