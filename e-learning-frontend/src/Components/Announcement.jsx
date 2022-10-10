import React from "react";

const Announcement = ({ title, content }) => {
    return (
        <div className="annoucement-block flex column">
            <p className="annoucement-title">{title}</p>
            <p className="content-outerview dark-txt">{content}</p>
        </div>
    );
};

export default Announcement;
