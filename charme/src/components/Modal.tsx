import React, { ReactNode } from "react";
import Modal from "react-modal";

interface CustomModalProps {
  isOpen: boolean;
  onRequestClose: () => void;
  children: ReactNode;
}

// Cấu hình modal
Modal.setAppElement("#root");

const CustomModal: React.FC<CustomModalProps> = ({
  isOpen,
  onRequestClose,
  children,
}) => {
  return (
    <Modal
      isOpen={isOpen}
      onRequestClose={onRequestClose}
      contentLabel="Custom Modal"
      className="modal"
      overlayClassName="modal-overlay"
    >
      <div>{children}</div>
      <button onClick={onRequestClose} className="close-btn">
        X
      </button>
    </Modal>
  );
};

export default CustomModal;
