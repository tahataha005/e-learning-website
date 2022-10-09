import React from "react";
import { useState } from "react";
import SideBar from "./SideBar";
import "../styles/Admin.css";
import AdminButton from "./AdminButton";
import Table from "./Table";

const Admin = () => {
    const buttons = [
        { id: 1, name: "Courses" },
        { id: 2, name: "Instructors" },
        { id: 3, name: "Students" },
    ];

    const userstamp = ["Admin", ""];

    const fake_data = [
        { id: 1, crn: "ENG", name: "engineering" },
        { id: 2, crn: "BS", name: "bussiness" },
        { id: 3, crn: "MAT", name: "math" },
        { id: 4, crn: "MOH", name: "mohammad" },
    ];
    return (
        <>
            <div className="page-container flex light-bg">
                <SideBar
                    buttons={buttons}
                    btn_class={"admin-btn"}
                    userstamp={userstamp}
                    side_class={"white-bg"}
                />
                <div className="page-content admin-content flex column">
                    <div className="interactions flex">
                        <p className="subtitle">Courses</p>
                        <div className="interaction-btns-container flex">
                            <AdminButton
                                text={"Add"}
                                className={"interaction-btn"}
                            />
                            <AdminButton
                                text={"Delete"}
                                className={"interaction-btn"}
                            />
                        </div>
                    </div>
                </div>
            </div>
        </>
    );
};

export default Admin;
