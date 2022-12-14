import React from "react";
import AdminButton from "./AdminButton";

const SideBar = ({
    buttons,
    btn_class,
    userstamp,
    side_class,
    setCurrent,
    current,
}) => {
    const side_bar_classes = `side-bar flex column round-edges ${side_class}`;
    return (
        <div className={side_bar_classes}>
            <div className="userstamp flex column">
                <p className="title">{userstamp[0]}</p>
                <p className="subtitle light-txt">{userstamp[1]}</p>
            </div>
            <div className="side-body">
                {buttons.map(btn => {
                    return (
                        <AdminButton
                            key={btn.id}
                            text={btn.name}
                            className={btn_class}
                            onClick={() => {
                                setCurrent(btn.name);
                                localStorage.setItem("current", current);
                                console.log(current);
                            }}
                        />
                    );
                })}
            </div>
        </div>
    );
};

export default SideBar;
