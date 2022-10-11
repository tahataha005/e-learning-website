import React from "react";
import Announcement from "./Announcement";
import "../styles/Student.css";
import Header from "./Header";
import SideBar from "./SideBar";
import { getUser } from "../hooks/getUserInfo.js";
import { useState, useEffect } from "react";

const Student = () => {
    const [userInfo, setUserInfo] = useState([]);

    const buttons = [
        { id: 1, name: "Electronics" },
        { id: 2, name: "Math" },
        { id: 3, name: "English" },
        { id: 4, name: "English" },
        { id: 5, name: "English" },
        { id: 6, name: "English" },
    ];

    useEffect(() => {
        const getUserInfo = async () => {
            const user_info = await getUser();
            setUserInfo(user_info);
        };

        getUserInfo();
    }, []);

    const announcements = [
        {
            id: 1,
            title: "Announcement 1",
            content:
                "Text Text Text Text Text Text Text Text Text Text Text Text",
        },
        { id: 2, title: "Announcement 2", content: "Text Text Text" },
        { id: 3, title: "Announcement 3", content: "Text Text Text" },
        { id: 4, title: "Announcement 4", content: "Text Text Text" },
        { id: 5, title: "Announcement 5", content: "Text Text Text" },
        { id: 5, title: "Announcement 5", content: "Text Text Text" },
        { id: 5, title: "Announcement 5", content: "Text Text Text" },
    ];

    const userstamp = [userInfo.username, "Student"];

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
                        <div className="announcements-wrapper flex column">
                            {announcements.map(announcement => {
                                return (
                                    <Announcement
                                        key={announcement.id}
                                        title={announcement.title}
                                        content={announcement.content}
                                    />
                                );
                            })}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    );
};

export default Student;
