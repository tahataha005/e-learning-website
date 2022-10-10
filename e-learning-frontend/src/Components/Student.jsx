import React from "react";
import "../styles/Student.css";
import Header from "./Header";
import SideBar from "./SideBar";

const Student = () => {
    const buttons = [
        { id: 1, name: "Electronics" },
        { id: 2, name: "Math" },
        { id: 3, name: "English" },
        { id: 4, name: "English" },
        { id: 5, name: "English" },
        { id: 6, name: "English" },
    ];

    const userstamp = ["Username", "Student"];

    return (
        <div className="page-container flex white-bg">
            <SideBar
                buttons={buttons}
                btn_class={"course-btn"}
                userstamp={userstamp}
                side_class={"light-bg"}
            />
            <div className="page-content student-content flex column">
                <Header />
                <div className="announcements-container flex row light-bg round-edges">
                    <div className="announcements-landing">
                        <div className="announcements-title flex">
                            <p className="subtitle dark-txt">Announcements</p>
                        </div>
                        <div className="announcements-wrapper flex column"></div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Student;
