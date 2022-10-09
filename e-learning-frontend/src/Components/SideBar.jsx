import React from "react";
import AdminButton from "./AdminButton";

const SideBar = ({ buttons, btn_class, userstamp, side_class }) => {
    const side_bar_classes = `side-bar flex column round-edges ${side_class}`;
    return (
        <div className={side_bar_classes}>
            <div className="userstamp flex column">
                <p className="title">{userstamp[0]}</p>
                <p className="subtitle">{userstamp[1]}</p>
            </div>
            <div className="side-body flex column">
                {buttons.map(btn => {
                    return (
                        <AdminButton
                            key={btn.id}
                            text={btn.name}
                            className={btn_class}
                        />
                    );
                })}
            </div>
        </div>
    );
};

export default SideBar;
