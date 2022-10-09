import React from "react";

const Admin = () => {
    const buttons = [
        { id: 1, name: "Courses" },
        { id: 2, name: "Instructors" },
        { id: 3, name: "Students" },
    ];

    const userstamp = ["Admin", ""];

    return (
        <>
            <div className="page-container flex light-bg">
                <SideBar
                    buttons={buttons}
                    btn_class={"admin-btn"}
                    userstamp={userstamp}
                    side_class={"white-bg"}
                />
            </div>
        </>
    );
};

export default Admin;
