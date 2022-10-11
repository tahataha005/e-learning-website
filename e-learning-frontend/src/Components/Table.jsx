import React from "react";

const Table = ({ data }) => {
    return (
        <>
            <table>
                {data.map(data => {
                    return (
                        <tr>
                            <td>{data.id}</td>
                            <td>{data.crn}</td>
                            <td>{data.name}</td>
                        </tr>
                    );
                })}
            </table>
        </>
    );
};

export default Table;
