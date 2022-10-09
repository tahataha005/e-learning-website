import React from "react";
import { useState } from "react";
import SideBar from "./SideBar";
import "../styles/Admin.css";
import AdminButton from "./AdminButton";
import Table from "./Table";

const Admin = () => {
    const [popup, setPopup] = useState(false);

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
                                onClick={() => {
                                    setPopup(!popup);
                                }}
                            />
                            <AdminButton
                                text={"Delete"}
                                className={"interaction-btn"}
                            />
                        </div>
                    </div>
                    <div className="records flex column round-edges white-bg">
                        <div className="table-headers flex dark-bg round-edges white-txt">
                            <table>
                                <tr>
                                    <td>ID</td>
                                    <td>CRN</td>
                                    <td>Name</td>
                                </tr>
                            </table>
                        </div>
                        <div className="table-data-container light-bg round-edges dark-txt">
                            <Table data={fake_data} />
                        </div>
                    </div>
                </div>
                {popup && (
                    <div className="add-popup flex">
                        <div className="pop-content flex column white-bg round-edges">
                            <div className="X-container flex">
                                <AdminButton
                                    className={"X-button"}
                                    text={"X"}
                                    onClick={() => {
                                        setPopup(false);
                                    }}
                                />
                            </div>
                            <div className="add-inputs flex column">
                                <p className="title">Add</p>
                                <AdminButton
                                    className={"admin-btn"}
                                    text={"Add"}
                                    onClick={() => {
                                        setPopup(false);
                                    }}
                                />
                            </div>
                        </div>
                    </div>
                )}
            </div>
        </>
    );
};

export default Admin;
